<template>
  <AppLayout title="Products">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-6 flex">
          <Link :href="route('products.create')" class="ml-auto px-4 py-2 bg-blue-600 text-white rounded-lg">
            Add
          </Link>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <table class="table w-full">
            <thead>
              <tr class="bg-gray-200">
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Price</th>
                <th class="py-2 px-4 text-left">Quantity</th>
                <th class="py-2 px-4 text-left">Total Value</th>
              </tr>
            </thead>
            <tbody>
              <template v-if="products.length<1">
                <tr>
                  <td class="text-center bg-gray-100 px-4 py-2" colspan="4">
                    No Data Found
                  </td>
                </tr>
              </template>
              <template v-for="(product, index) in products">
                <tr class="">
                  <td class="px-4 py-2">{{ product.name }}</td>
                  <td class="px-4 py-2">{{ product.price }}</td>
                  <td class="px-4 py-2">{{ product.quantity }}</td>
                  <td class="px-4 py-2">{{ product.quantity * product.price }}</td>
                </tr>
              </template>
            </tbody>
            <tfoot>
              <tr class="bg-gray-200">
                <td class="text-right px-4 py-2" colspan="3">Total</td>
                <td class="text-right px-4 py-2">{{totalValue}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  products: Object,
})

const totalValue = computed(() => {
  return Object.values(props.products)
    .map(p => p.price * p.quantity).reduce((acc, value) => acc + value, 0)
})

</script>

<style scoped>

</style>
