<template>
  <div>
    <ws-navigation :activeIndex="'4'"></ws-navigation>
    <el-row>
      <el-col :span="10" :offset="6">
        <div class="grid-content">
          <el-card class="box-card">
            <div slot="header" class="clearfix">
              <span>Daftar Sekarang</span>
            </div>
            <el-form :model="register" status-icon :rules="validation" ref="register" label-width="180px" :label-position="labelPosition">
              <el-form-item label="Nama lengkap" prop="username">
                <el-input type="text" v-model="register.username" auto-complete="off"></el-input>
              </el-form-item>
              <el-form-item label="E-Mail" prop="email">
                <el-input type="email" v-model="register.email" auto-complete="off"></el-input>
              </el-form-item>
              <el-form-item label="Password" prop="password">
                <el-input type="password" v-model="register.password" auto-complete="off"></el-input>
              </el-form-item>
              <el-form-item label="Konfirmasi Password" prop="repassword">
                <el-input type="password" v-model="register.repassword" auto-complete="off"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary" @click="onRegister('register')">Daftar</el-button>
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
      register: {
        username:'',
        email:'',
        password:'',
        repassword:'',
      },
      validation: {
        username: [
          { required: true, message: 'Nama lengkap tidak boleh kosong', trigger: 'change'},
          { min: 3, max: 32, message: 'Nama lengkap harus dimasukkan setidaknya 3 huruf', trigger: 'change' }
        ],
        email: [
          { required: true, message: 'E-Mail tidak boleh kosong', trigger: 'change'},
          { min: 5, max: 32, message: 'E-Mail harus dimasukkan setidaknya 5 huruf dan menggunakan "@"', trigger: 'change' }
        ],
        password: [
          { validator: this.validatePassword, trigger: 'change'},
          { required: true, message: 'Password tidak boleh kosong', trigger: 'change'},
          { min: 5, max: 32, message: 'Password harus dimasukkan setidaknya 5 huruf', trigger: 'change' }
        ],
        repassword: [
          { validator: this.validateRepassword, trigger: 'change'},
          { required: true, message: 'Repassword tidak boleh kosong', trigger: 'change'},
          { min: 5, max: 32, message: 'Repassword harus dimasukkan setidaknya 5 huruf', trigger: 'change' }
        ],
      },
      labelPosition: 'left'
    }
  },
  methods:{
    onRegister(form){
      this.$refs[form].validate((valid) => {
        if (valid) {
          this.$http.post('register', this.register).then(
            function(response){
              if(response.body.status == 'success'){
                this.$message({ message: response.body.message, type: response.body.status })
                return this.$router.push('login')
              } else {
                return this.$message.error(response.body.message)
              }
            },
            function(response){
              if(response.body.status == 'error'){
                return this.$message.error(response.body.message)
              } else {
                
              }
            }
          )
        } else {
          return false
        }
      })
    },
    validatePassword(rule, value, callback){
      if (value === '') {
        callback(new Error('Password tidak boleh kosong'))
      } else {
        if (this.register.repassword !== '') {
          this.$refs.register.validateField('repassword')
        }
        callback()
      }
    },
    validateRepassword(rule, value, callback){
      if (value === '') {
        callback(new Error('Silahkan masukkan kembali password anda'))
      } else if (value !== this.register.password) {
        callback(new Error('Password tidak cocok'))
      } else {
        callback()
      }
    }
  }
}
</script>