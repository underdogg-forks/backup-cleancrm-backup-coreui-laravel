<template>
    <div class="row">
        <div class="col-md-6">
            <span class="text-muted float-md-left" v-html="paginationInfo"></span>
        </div>
        <div class="col-md-6">
            <ul v-if="tablePagination && tablePagination.last_page > 1" class="pagination float-md-right">
                <li :class="['page-item', isOnFirstPage ? 'disabled' : '']">
                    <a class="page-link" @click="loadPage(1)">
                        <i class="fas fa-angle-double-left"></i>
                    </a>
                </li>
                <li :class="['page-item', isOnFirstPage ? 'disabled' : '']">
                    <a class="page-link" @click="loadPage('prev')">
                        <i class="fas fa-angle-left"></i>
                    </a>
                </li>
                <template v-if="notEnoughPages">
                    <template v-for="n in totalPage">
                        <li :class="['page-item', isCurrentPage(n) ? 'active' : '']">
                            <a class="page-link" @click="loadPage(n)" v-html="n"></a>
                        </li>
                    </template>
                </template>
                <template v-else>
                    <template v-for="n in windowSize">
                        <li :class="['page-item', isCurrentPage(windowStart+n-1) ? 'active' : '']">
                            <a class="page-link" @click="loadPage(windowStart+n-1)"
                               v-html="windowStart+n-1">
                            </a>
                        </li>
                    </template>
                </template>
                <li :class="['page-item', isOnLastPage ? 'disabled' : '']">
                    <a class="page-link" @click="loadPage('next')">
                        <i class="fas fa-angle-right fa-sm"></i>
                    </a>
                </li>
                <li :class="['page-item', isOnLastPage ? 'disabled' : '']">
                    <a class="page-link" @click="loadPage(totalPage)">
                        <i class="fas fa-angle-double-right fa-sm"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import PaginationMixin from "vuetable-2/src/components/VuetablePaginationMixin.vue"
    import PaginationInfoMixin from "vuetable-2/src/components/VuetablePaginationInfoMixin"

    export default {
        mixins: [
            PaginationMixin, PaginationInfoMixin
        ],

        props: {
            infoTemplate: {
                type: String,
                default: 'Displaying {from} to {to} of {total} records'
            },
            noDataTemplate: {
                type: String,
                default: 'No records found.'
            }
        }
    }
</script>