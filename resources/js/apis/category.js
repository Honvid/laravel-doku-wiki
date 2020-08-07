import axios from 'axios'

export function getCategories() {
  return axios.request({
    'url': '/api/categories',
    'method': 'get'
  })
}

export function getCategory(id) {
  return axios.request({
    'url': '/api/categories/' + id,
    'method': 'get',
  })
}
