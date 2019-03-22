<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center>
    <h1>Daftar Peminjam</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">Back</button>
    </router-link>
    <router-link to="/peminjam/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">Tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Nama Peminjam</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th>Buku yang Dipinjam</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(peminjam, i) in data_peminjam" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ peminjam.nama_peminjam }}</td>
          <td>{{ peminjam.alamat }}</td>
          <td>{{ peminjam.no_hp }}</td>
          <td>{{ peminjam.judul_buku}}</td>
          <td>
            <router-link :to="'/peminjam/' + peminjam.id">
            <button type="button" class="btn btn-sm btn-primary">Edit</button></router-link>
            <button @click="deleteRow(peminjam.id)" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr>
    </table>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'peminjam',
  data () {
    return {
      data_peminjam: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:83/perpustakaan/public/'
      let url2 = 'peminjam'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_peminjam = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:83/perpustakaan/public/peminjam/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
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
