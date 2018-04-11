<template>
    <app-panel>
        <div class="row">
            <div class="col-xs-12 form-inline">
                {{ query }}
            </div>
        </div>
        <div class="row">
            <div id="table" class="col-xs-12 table-responsive">
                <datatable v-bind="$data">
                    <button class="btn btn-default" @click="alertSelectedUids" :disabled="!selection.length">
                        <i class="fa fa-commenting-o"></i>
                        Alert selected uid(s)
                    </button>
                </datatable>
            </div>
        </div>
    </app-panel>
</template>

<script>
    import vue from 'vue';
    import axios from 'axios';
    import _ from 'lodash';
    import CustomActions from './CustomActions.vue';
    import FilterBar from './FilterBar.vue';

    export default {
        components: {
            CustomActions,
            FilterBar
        },
        props: ['row'],
        data: function () {
            const amINestedComp = !!this.row;

            return {
                //supportBackup: true,
                //supportNested: true,
                fixHeaderAndSetBodyMaxHeight: 200,
                tblClass: 'table-bordered table-condensed',
                tblStyle: 'table-layout: fixed',
                pageSizeOptions: [5, 10, 15, 20],
                columns: (() => {
                    const cols = [
                        {title: 'ID', field: 'id', label: 'ID', sortable: true, visible: true},
                        {title: 'Nome', field: 'name', label: 'Nome', thComp: FilterBar},
                        {title: 'Email', field: 'email'},
                        {title: 'Status', field: 'active', sortable: true},
                        {title: 'Ações', label: 'Ações', tdComp: CustomActions, visible: true}
                    ];
                    const groupsDef = {
                        Ordenar: ['ID', 'Nome'],
                        Colunas: ['ID', 'Nome', 'Email', 'Status'],
                        Extra: ['Ações']
                    };
                    return cols.map(col => {
                        Object.keys(groupsDef).forEach(groupName => {
                            if (groupsDef[groupName].includes(col.title)) {
                                col.group = groupName
                            }
                        });
                        return col
                    })
                })(),
                data: [],
                total: 0,
                selection: [],
                summary: {},
                allRows: [],
                search: '',

                query: {},
                // any other staff that you want to pass to dynamic components (thComp / tdComp / nested components)
                xprops: {
                    eventbus: new Vue() // only for the current Datatable instance
                }
            }
        },
        watch: {
            query: {
                handler (query) {
                    this.handleQueryChange(query)
                },
                deep: true
            }
        },
        methods: {
            handleQueryChange (query) {
                if (this.allRows.length === 0) {
                    axios.get('/api/users').then((res) => {
                        this.allRows = res.data.data;
                        this.data = this.allRows.slice(query.offset, query.limit);
                        this.total = this.allRows.length;
                    });
                }
                else {
                    this.data = this.allRows.slice(query.offset, query.offset + query.limit);
                    if (query.sort) {
                        let sorted = _.orderBy(this.allRows, query.sort, query.order)
                        this.data = sorted.slice(query.offset, query.offset + query.limit)
                    }
                }
            },
            alertSelectedUids () {
                alert(this.selection.map(({id}) => id))
            },
        },
        created () {
            // init query (make all the properties observable by using `$set`)
            const q = { limit: 5, offset: 0, sort: '', order: '', ...this.query };
            Object.keys(q).forEach(key => { this.$set(this.query, key, q[key]) })
        }
    }
</script>
<style>
    .w-240 {
        width: 240px;
    }
</style>