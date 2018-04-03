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
    import mockData from './mockData';

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
                tblClass: 'table-bordered table-condensed',
                tblStyle: 'color: #666',
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
                handler () {
                    this.handleQueryChange()
                },
                deep: true
            }
        },
        methods: {
            handleQueryChange () {
                mockData(this.query).then(({ rows, total, summary }) => {
                    this.data = rows;
                    this.total = total;
                    this.summary = summary
                })
            },
            alertSelectedUids () {
                alert(this.selection.map(({id}) => id))
            },
        }
    }
</script>
<style>
    .w-240 {
        width: 240px;
    }
</style>