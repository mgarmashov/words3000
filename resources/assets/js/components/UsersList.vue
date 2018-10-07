<template>
    <div class="row justify-content-center">
        <div class="col-12">
            <button @click="update" class="btn btn-default text mb-1" v-if="!is_refresh">Обновить - {{id}}</button>
            <span class="badge badge-danger mb-1" v-if="is_refresh">Обновление</span>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Is admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in usersList">
                        <td></td>
                        <td>{{ user.login }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.is_admin }}</td>
                    </tr>

                </tbody>
            </table>
            <div class="card card-default">
                <div class="card-header">Example Component</div>

                <div class="card-body">
                    I'm an example component.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                usersList: [],
                is_refresh: false,
                id: 0
            }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function() {

                this.is_refresh = true;
                axios.get('/admin/users-list').then((response) => {
                    this.usersList = response.data;
                    this.is_refresh = false;
                    this.id++;
                })
            }
        }
    }
</script>
