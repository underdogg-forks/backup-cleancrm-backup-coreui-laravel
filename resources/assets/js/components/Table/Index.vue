<template>
    <div class="card">
        <slot name="title"></slot>
        <vuetable ref="vuetable"
                  :api-url="endpoint"
                  :fields="fields"
                  pagination-path=""
                  :css="css.table"
                  :sort-order="sortOrder"
                  :multi-sort="true"
                  :append-params="moreParams"
                  @vuetable:cell-clicked="onCellClicked"
                  @vuetable:pagination-data="onPaginationData"
        >
            <template v-for="field in fields"
                      v-if="extractName(field.name) === '__slot'"
                      :slot="extractArgs(field.name)"
                      slot-scope="props"
            >
                <slot :name="extractArgs(field.name)" :row-data="props.rowData"></slot>
            </template>
        </vuetable>

        <div class="card-footer">
            <table-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage"></table-pagination>
        </div>
    </div>
</template>

<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable'
    import TablePagination from './Pagination'
    import VuetablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'

    export default {
        components: {
            Vuetable,
            TablePagination,
            VuetablePaginationInfo,
        },

        props: {
            endpoint: {
                type: String,
                required: true
            },
            fields: {
                required: true,
                type: Array
            },
            sortOrder: {
                type: Array,
                default: () => [],
            },
            moreParams: {
                type: Object,
                default: () => {},
            }
        },
        data() {
            return {
                css: {
                    table: {
                        tableClass: 'table table-responsive-sm table-hover table-hover mb-0',
                        ascendingIcon: 'fas fa-sort-up',
                        descendingIcon: 'fas fa-sort-down',
                        sortableIcon: 'fas fa-sort',
                    },
                },
            }
        },

        methods: {
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page)
            },
            onCellClicked(data, field, event) {
                console.log('cellClicked: ', field.name)
            },

            extractName(string) {
                return string.split(':')[0].trim()
            },

            extractArgs(string) {
                return string.split(':')[1]
            },
        },
    }
</script>