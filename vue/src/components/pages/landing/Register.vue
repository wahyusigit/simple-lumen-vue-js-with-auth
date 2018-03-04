<template>
  <div>
    <ws-navigation :activeIndex="'4'"></ws-navigation>
    <el-row>
      <el-col :span="8" :offset="8">
        <div class="grid-content">
          <transition name="el-zoom-in-top">
            <el-card class="box-card">
              <div slot="header" class="clearfix">
                <span>Daftar Sekarang</span>
              </div>
              <el-form ref="form" label-width="120px" :label-position="labelPosition">
                <el-form-item label="Nama lengkap">
                  <el-input type="text" v-model="register.nama_lengkap"></el-input>
                </el-form-item>
                <el-form-item label="E-Mail">
                  <el-input type="email" v-model="register.name"></el-input>
                </el-form-item>
                <el-form-item label="Password">
                  <el-input type="password" v-model="register.password"></el-input>
                </el-form-item>
                <el-form-item>
                  <el-button type="primary" @click="onRegister()">Daftar</el-button>
                </el-form-item>
              </el-form>
            </el-card>
          </transition>
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
        nama_lengkap:'',
        email:'',
        password:''
      },
      labelPosition: 'left'
    }
  },
  methods:{
    onRegister(){
      
    }
  }
}
</script>
