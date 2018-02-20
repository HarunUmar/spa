<template>
<div> ini halaman admin 
        <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive">
                            <tbody>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                <tr v-for="(posts, index) in posts">
                                    <td>{{ index + 1 }}</td>
                                    <td>
                                        {{ posts.title }}
                                    </td>
                                    <td>
                                        {{ posts.description }}
                                    </td>
                                    <td>
                                        <button @click="initUpdate(index)" class="btn btn-success btn-xs">Edit</button>
                                        <button @click="deletePost(index)" class="btn btn-danger btn-xs">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


</div>
</template>

<script>

import auth from '../../auth.js';
export default{
    data() {
        return {
            auth: auth
        }
    },

}
</script>