<template>
<app-panel>
    <div class="row">
        <div class="col-xs-12 form-inline">
            <div class="form-group">
                <label for="filter" class="sr-only">Filter</label>
                <input type="text" class="form-control" v-model="filter" placeholder="Filter">
            </div>
        </div>
    </div>

    <div class="row">
        <div id="table" class="col-xs-12 table-responsive">
            <datatable :columns="columns" :data="rows" :filter-by="filter"></datatable>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 form-inline">
            <datatable-pager v-model="page" type="abbreviated" :per-page="per_page"></datatable-pager>
        </div>
    </div>
</app-panel>
</template>

<script>

    import axios from 'axios';

    export default {
        data: function () {
            return {
                filter: '',
                columns: [
                    {label: 'ID', field: 'id', align: 'center', filterable: false, sortable: false},
                    {label: 'Nome', field: 'name'},
                    {label: 'Email', field: 'email'},
                    {label: 'Status', field: 'active'},
                ],
                rows: [],
                page: 1,
                per_page: 10
            }
        },
        methods:{
            getData: function(params, setRowData){
                axios.get('/api/users').then(function(response){
                    let start_index = (params.page_number - 1) * params.page_length;
                    let end_index = start_index + params.page_length;

                    setRowData(
                        response.data.slice(start_index, end_index),
                        response.data.length
                    );
                }.bind(this));
            }
        },
        mounted: function(){
            this.getData()
        }
    }
</script>

<style scoped>

</style>