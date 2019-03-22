<template>
  <div class="hello" style="position:relative; bottom:60px">
    <p style="color:grey; font-size:20px;">____________________________________________________________________________</p>
    <p style="color:grey; font-size:20px; position:relative; bottom:20px;">____________________________________________________________________________</p>
    <center>
    <h1>Daftar Buku</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:350px;">back</button>
    </router-link>
    <router-link to="/buku/create">
    <button type="button" class="btn btn-sm btn-primary " style="position:relative; bottom:10px; right:350px;">tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" >
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(buku, i) in data_buku" :key="i">
          <td>{{ i + 1 }}</td>
          <td>{{ buku.judul_buku }}</td>
          <td>{{ buku.pengarang }}</td>
          <td>{{ buku.tahun_terbit }}</td>
          <td>
            <router-link :to="'/buku/' + buku.id">
            <button type="button" class="btn btn-sm btn-primary">edit</button></router-link>
            <button @click="deleteRow(buku.id)" class="btn btn-sm btn-danger">delete</button>
          </td>
        </tr>
    </table>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'buku',
  data () {
    return {
      data_buku: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost:83/perpustakaan/public/'
      let url2 = 'buku'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_buku = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost:83/perpustakaan/public/buku/'
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
