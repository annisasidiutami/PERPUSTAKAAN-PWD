<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center><br>
    <router-link to="/peminjam">
    <button type="button" class="btn btn-md btn-primary" style="position:relative; bottom:10px; right:390px;">back</button>
    </router-link>
    <h2>Data Peminjam</h2>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Peminjam </label></td>
        <td><input type="text" v-model="peminjam.nama_peminjam"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Alamat</label></td>
        <td><input type="text"  v-model="peminjam.alamat" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>No. HP</label></td>
        <td><input type="number" v-model="peminjam.no_hp" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Judul Buku yang Dipinjam</label></td>
        <td><input type="text" v-model="peminjam.judul_buku" class="form-control" required></td>
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
  name: 'TambahPeminjam',
  data () {
    return {
      peminjam: {
        id: null,
        nama_peminjam: '',
        alamat: '',
        no_hp: '',
        judul_buku: '',
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost:83/perpustakaan/public/peminjam/'
      api.get(url + id).then(res => {
        this.peminjam = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.peminjam
      let url = 'http://localhost:83/perpustakaan/public/peminjam'

      if (this.peminjam.id) {
        url += '/' + this.peminjam.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/peminjam')
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
