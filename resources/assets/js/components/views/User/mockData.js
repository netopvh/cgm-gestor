import moment from 'moment'
import orderBy from 'lodash/orderBy'
import axios from 'axios'
const typeOf = o => Object.prototype.toString.call(o).slice(8, -1).toLowerCase()
const purify = o => JSON.parse(JSON.stringify(o)) // purify data

/**
 * mockData - simulate Ajax request and respond
 * @param   {Object} query
 * @resolve {Object}
 */
export default function mockData(query) {
    query = purify(query);
    const {limit = 10, offset = 0, sort = '', order = ''} = query;

    let rows = [];

    axios.get('/api/users')
        .then((res) => {
            rows = res.data.data;
            console.log(rows);
        });
    console.log(rows);

    // custom query conditions
    ['id', 'name', 'email', 'active'].forEach(field => {
        switch (typeOf(query[field])) {
            case 'array':
                rows = rows.filter(row => query[field].includes(row[field]))
                break;
            case 'string':
                rows = rows.filter(row => row[field].toLowerCase().includes(query[field].toLowerCase()))
                break;
            default:
                // nothing to do
                break
        }
    });

    if (sort) {
        rows = orderBy(rows, sort, order)
    }

    const res = {
        rows: rows.slice(offset, offset + limit),
        total: rows.length,
        summary: {
            id: rows.length,
            name: rows.length && ~~(rows.map(({name}) => name).reduce((sum, cur) => sum + cur) / rows.length), // average age
        }
    };

    const consoleGroupName = 'Mock data - ' + moment().format('YYYY-MM-DD HH:mm:ss')
    setTimeout(() => {
        console.group(consoleGroupName)
        console.info('Receive:', query)
        console.info('Respond:', res)
        console.groupEnd(consoleGroupName)
    }, 0)
    return Promise.resolve(purify(res))
}
