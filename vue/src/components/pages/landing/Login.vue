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
            <el-form :model="login" status-icon :rules="validation" ref="login" label-width="180px" :label-position="labelPosition">
              <el-form-item label="E-Mail" prop="email">
                <el-input type="email" v-model="login.email" auto-complete="off">{{login.email}}</el-input>
              </el-form-item>
              <el-form-item label="Password" prop="password">
                <el-input type="password" v-model="login.password" auto-complete="off">{{login.password}}</el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="onLogin('login')">Login</el-button>
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
      validation: {
        email: [
          { required: true, message: 'E-Mail tidak boleh kosong', trigger: 'change'},
          { min: 5, max: 32, message: 'E-Mail harus dimasukkan setidaknya 5 huruf dan menggunakan "@"', trigger: 'change' }
        ],
        password: [
          { required: true, message: 'Password tidak boleh kosong', trigger: 'change'},
          { min: 5, max: 32, message: 'Password harus dimasukkan setidaknya 5 huruf', trigger: 'change' }
        ],
      },
      labelPosition: 'left'
    }
  },
  methods:{
    onLogin(form){
      var selfs = this
      this.$refs[form].validate((valid) => {
        if (valid) {
          this.$http.post('login', this.login).then(
            function(response){
              if(response.body.status == 'success'){
                this.$message({ message: response.body.message, type: response.body.status })
                this.$ls.set('token',response.body.token)
                selfs.$auth.setHeaders(response.body.token)
                // return this.$router.push('dashboard')
              } else {
                return this.$message.error(response.body.message)
              }
            }
          )
        } else {
          return false
        }
      })
    }
  }
}
</script>
