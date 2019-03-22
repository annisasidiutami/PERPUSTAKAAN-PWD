import axios from 'axios'

export const api = axios.create({
  baseURl: 'http://localhost:83/pesanjasa/public/'
})
