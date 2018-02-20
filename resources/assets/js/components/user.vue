<template>
	<table class="table">
		<thead>
			<tr>
				<th>#</th>
				<th>{{dinda}}</th>
				<th>Crated</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<tr v-for="(user, index) in users.data">
				<td>{{ users.from + index }}</td>
				<td>{{ user.email }}</td>
				<td>{{ user.created_at }}</td>
				<td>#</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
import swit from 'sweetalert2';
	export default {
		data() {
			return {
				users: [],
				dinda: '',
			}
		},

		mounted() {
			const url = '/api/paginate';
			// listen when search
			this.$bus.$on('cari', keyword => {
				this.getUser(url,keyword);
			});

			
		},

		methods: {
			getUser(url, params) {
				this.dinda =  params

			}
		}
	}
</script>