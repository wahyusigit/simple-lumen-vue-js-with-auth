<template>
  <div>
    <el-row style="margin-bottom:20px">
      <el-col :span="24">
        <div class="grid-content">
          <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <el-menu-item index="1">
              <router-link to="/"><i class="el-icon-menu"></i>Home</router-link>
            </el-menu-item>
            <el-submenu index="2">
              <template slot="title">Workspace</template>
              <el-menu-item index="2-1">item one</el-menu-item>
              <el-menu-item index="2-2">item two</el-menu-item>
              <el-menu-item index="2-3">item three</el-menu-item>
              <el-submenu index="2-4">
                <template slot="title">item four</template>
                <el-menu-item index="2-4-1">item one</el-menu-item>
                <el-menu-item index="2-4-2">item two</el-menu-item>
                <el-menu-item index="2-4-3">item three</el-menu-item>
              </el-submenu>
            </el-submenu>
            <el-menu-item index="3">
              <router-link to="login">Login</router-link>
            </el-menu-item>
            <el-menu-item index="4">
              <router-link to="register">Register</router-link>
            </el-menu-item>
          </el-menu>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
  export default {
    props: ['activeIndex'],
  }
</script>
<style>
a {
  text-decoration: none;
}
</style>