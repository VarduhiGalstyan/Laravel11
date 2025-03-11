import { defineStore } from 'pinia'
import axios from 'axios'

export const useProductsStore = defineStore('products', {
  state: () => ({
    products: [],
    nextPageUrl: null,
    prevPageUrl: null
  }),

  actions: {
    async loadProducts(url = 'http://127.0.0.1:8000/productsapi') {
      try {
        const response = await axios.get(url)
        console.log("API Response:", response.data) // ✅ Ստուգում ենք՝ ինչ տվյալներ է ստանում API-ն
        
        if (Array.isArray(response.data)) {
          this.products = response.data
        } else {
          console.error("Unexpected API response format:", response.data)
          this.products = []
        }

        this.nextPageUrl = response.data.next_page_url || null
        this.prevPageUrl = response.data.prev_page_url || null
      } catch (error) {
        console.error("Error loading products:", error)
      }
    }
  }
})
