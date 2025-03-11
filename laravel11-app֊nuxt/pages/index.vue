<template>
  <div class="container">
    <h1> Professions </h1>
    
    <div v-if="products.length === 0" class="loading">Loading products...</div> 

    <div class="products-list">
      <div v-for="product in products" :key="product.id" class="product-card">
        <h3>{{ product.title }}</h3>
        <p><strong>Name:</strong> {{ product.name }}</p>
        <p><strong>Birth Date:</strong> {{ product.date_of_birth || "N/A" }}</p>
        <p v-html="product.description"></p>
      </div>
    </div>

    <div class="pagination">
      <button v-if="prevPageUrl" @click="loadProducts(prevPageUrl)">⬅️ Previous</button>
      <button v-if="nextPageUrl" @click="loadProducts(nextPageUrl)">Next ➡️</button>
    </div>
  </div>
</template>

<script setup>
import { useProductsStore } from '~/stores/products'
import { onMounted, computed } from 'vue'

const productsStore = useProductsStore()

onMounted(() => {
  productsStore.loadProducts()
})

const products = computed(() => productsStore.products)
const nextPageUrl = computed(() => productsStore.nextPageUrl)
const prevPageUrl = computed(() => productsStore.prevPageUrl)

const loadProducts = (url) => {
  productsStore.loadProducts(url)
}
</script>

<style scoped>
.container {
  background-color: #0056b3;
  max-width: 800px;
  margin: auto;
  padding: 20px;
  text-align: center;
}

h1 {
  color: #fff;
}

.loading {
  font-size: 18px;
  color: gray;
}

.products-list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 20px;
}

.product-card {
  background: #fff;
  padding: 15px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.product-card:hover {
  transform: scale(1.05);
}

.product-card h3 {
  color: #007bff;
}

.pagination {
  margin-top: 20px;
}

button {
  padding: 10px 20px;
  margin: 5px;
  border: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  border-radius: 5px;
  font-size: 16px;
}

button:hover {
  background-color: #0056b3;
}
</style>
