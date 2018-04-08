<template>
    <data-table endpoint="https://vuetable.ratiw.net/api/users" :fields="fields">
        <h5 slot="title" class="card-header">
            <i class="fas fa-users fa-fw"></i> Manage Users

            <span class="card-actions">
                <a href="#" class="text-blue" data-toggle="tooltip" title="Add New User">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </span>
        </h5>
        <template slot="actions" slot-scope="{rowData}">
            Actions {{ rowData.id }}
        </template>

        <template slot="other" slot-scope="{rowData}">
            Other {{ rowData.name }}
        </template>

    </data-table>
</template>

<script>
    import DataTable from '../../../../../../resources/assets/js/components/Table/Index'

    export default {
        components: {
            DataTable
        },

        data() {
            return {
                fields: [
                    {
                        name: 'name',
                        sortField: 'name',
                    },
                    {
                        name: 'email',
                        sortField: 'email'
                    },
                    {
                        name: '__slot:actions',
                        title: 'Action',
                    },
                    {
                        name: '__slot:other',
                        title: 'Other Action',
                    },
                ],
            }
        }
    }
</script>