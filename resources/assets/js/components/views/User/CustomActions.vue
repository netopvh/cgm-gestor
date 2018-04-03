<template>
    <div class="btn-group btn-group-sm">
        <button class="btn btn-sm btn-primary btn-icon btn-rounded" title="Editar"
                @click="toggleNestedComp('DisplayRow')">
            <i class="fa fa-edit"></i>
        </button>
    </div>
</template>
<script>

    export default {
        props: ['row', 'nested'],
        data: () => ({
            url: 'http://cgm-gestor.local'
        }),
        mounted () {
            $(this.$el).find('button[title]').tooltip()
        },
        computed: {
        },
        methods: {
            toggleNestedComp (comp) {
                const { nested } = this;
                if (nested.comp === comp) return nested.$toggle();
                nested.$toggle(comp, true)
            },
            editar(){

            }
        }
    }
</script>
<style>
    .-nested-comp-open-btn {
        color: #fff !important;
        background-color: #337ab7 !important;
    }
</style>
