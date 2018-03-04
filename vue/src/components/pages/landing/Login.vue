<template>
  <div>
    <ws-navigation :activeIndex="'3'"></ws-navigation>
    <el-row>
      <el-col :span="8" :offset="8">
        <div class="grid-content">
          <el-card class="box-card">
            <div slot="header" class="clearfix">
              <span>Silahkan Masuk</span>
            </div>
            <el-form ref="form" label-width="120px" :label-position="labelPosition">
              <el-form-item label="E-Mail">
                <el-input type="email" v-model="login.name"></el-input>
              </el-form-item>
              <el-form-item label="Password">
                <el-input type="password" v-model="login.password"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="onLogin()">Login</el-button>
              </el-form-item>
            </el-form>
          </el-card>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default{
  data(){
    return{
      login: {
        email:'',
        password:''
      },
      labelPosition: 'left'
    }
  },
  methods:{
    onLogin(){

    }
  }
}
</script>
