<template>
	<div>
		
		<el-row class="tac">
		  <el-col :span="5">
		  	<el-menu
		      default-active="2"
		      class="el-menu-vertical-demo"
		      @open="handleOpen"
		      @close="handleClose"
		      background-color="#545c64"
		      text-color="#fff"
		      active-text-color="#ffd04b">
		      <el-menu-item index="4">
		        <i class="el-icon-setting"></i>
		        <span>Navigator Four</span>
		      </el-menu-item>
		    </el-menu>
		    <el-menu default-active="2">
		      <el-menu-item index="1">
		        <i class="el-icon-menu"></i>
		        <span>Menu 1</span>
		      </el-menu-item>
		      <el-menu-item index="2">
		        <i class="el-icon-menu"></i>
		        <span>Menu 2</span>
		      </el-menu-item>
		      <el-menu-item index="3">
		        <i class="el-icon-menu"></i>
		        <span>Menu 3</span>
		      </el-menu-item>
		      <el-menu-item index="4">
		        <i class="el-icon-menu"></i>
		        <span>Menu 4</span>
		      </el-menu-item>
		      <el-menu-item index="5">
		        <i class="el-icon-menu"></i>
		        <span>Menu 5</span>
		      </el-menu-item>
		    </el-menu>
		  </el-col>
		</el-row>
	</div>
</template>
