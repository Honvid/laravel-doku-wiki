import axios from 'axios'

export function getBooks(params) {
  return axios.request({
    'url': '/api/books',
    'method': 'get',
    'params': params
  })
}

export function getRecommendBooks(params) {
  return axios.request({
    'url': '/api/books/recommend',
    'method': 'get',
    'params': params
  })
}

export function getBook(id) {
  return axios.request({
    'url': '/api/books/' + id,
    'method': 'get',
  })
}

export function getBookBlacklist(id) {
  return axios.request({
    'url': '/api/books/' + id + '/blacklist',
    'method': 'get',
  })
}

export function getPage(id) {
  return axios.request({
    'url': '/api/pages/' + id,
    'method': 'get',
  })
}