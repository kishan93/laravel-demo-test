<template>

  <AppLayout title="Product Create">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Product Create
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <!-- -->
          <div class="w-1/2 px-4 py-2">
            <form class="mt-4">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Product Name
                </label>
                <input
                  v-model="form.name"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  type="text"
                  placeholder="Product name"
                />
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Quantity
                </label>
                <input
                  v-model="form.quantity"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  type="number"
                />
              </div>

              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                  Price
                </label>
                <input
                  v-model="form.price"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                  type="number"
                />
              </div>

              <div class="mb-4">
                <button @click.prevent="onSave" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                  Save
                </button>
              </div>

            </form>
          </div>
          <!-- -->

        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link, router, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  price: 0,
  quantity: 0,
})

const onSave = () => {
  form.post(route('products.store'))
}

</script>

<style scoped>

</style>
