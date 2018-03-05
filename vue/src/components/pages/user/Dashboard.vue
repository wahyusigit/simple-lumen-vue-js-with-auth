<template>
	<div>
		<el-card class="box-card">
			<div v-for="o in 4" :key="o" class="text item">
				{{'List item ' + o }}
			</div>
		</el-card>
	</div>
</template>

<script>
export default{
	data(){
		return{
			account:{
				username:'',
				email:''
			}
		}
	},
	mounted(){
		var config = {
			
		}
		this.$http.get('dashboard').then(
			function(response){
				console.log(response)
			},
			function(response){
				console.log(response)
			}
		);
	},
}
</script>

<style>
  .el-carousel__item h3 {
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 300px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
</style>