<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center><br>
    <router-link to="/buku">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Data Buku</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Judul buku </label></td>
        <td><input type="text" v-model="buku.judul_buku"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Pengarang</label></td>
        <td><input type="text"  v-model="buku.pengarang" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Tahun Terbit</label></td>
        <td><input type="number" v-model="buku.tahun_terbit" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-info" style="position:relative; left:360px;">Save</button>
    </form>
    </center>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'TambahBuku',
  data () {
    return {
      buku: {
        id: null,
        judul_buku: '',
        pengarang: '',
        tahun_terbit: '',
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:83/perpustakaan/public/buku/'
      api.get(url + id).then(res => {
        this.buku = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.buku
      let url = 'http://localhost:83/perpustakaan/public/buku'

      if (this.buku.id) {
        url += '/' + this.buku.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/buku')
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
