<template>
	<form @submit.prevent="search" method="post">
		<div class="form-group">
			<label>Keyword</label>
			<input v-model="state.keyword" type="text" class="form-control">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Search</button>
		</div>
	</form>
	
</template>

<script>

import swit from 'sweetalert2'; 

	export default {
		props: {
			limit: {
				type: Number,
				default: 20
			}
		},

		data() {
			return {
				state: {
					keyword: ''
				}
			}
		},

		methods: {
			search() {

				this.$bus.$emit('cari', this.state.keyword);

			}
		}
	}
</script>