<template>
	<div class="FieldField_wrapper">
		<img v-bind:src="imagePreview" class="preview-image" v-on:click="openUpload">

		<input 
			type="file" 
			name="image" 
			id="file-field" 
			v-on:change="updatePreview"
			style="display: :none;">
			</input>
	</div>	
</template>

<script>
	export default{
		data () {
			return {
				imagePreview:'/adminlte/upload.png'
			}
		},

		methods: {
			openUpload(){

			},

		updatePreview (e) {



			}
		}
	}
</script>

<style>

</style>