<template>
  <tr :class="{'bg-blue-100': editing}" class="cursor-pointer" @click="onEdit">
    <td class="px-4 py-2">
      <template v-if="editing">
        <input
          v-model="form.name"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="text"
        />
      </template>
      <template v-else>{{ product.name }}</template>
    </td>
    <td class="px-4 py-2">
      <template v-if="editing">
        <input
          v-model="form.quantity"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="number"
        />
      </template>
      <template v-else>{{ product.quantity }}</template>
    </td>
    <td class="px-4 py-2">
      <template v-if="editing">
        <input
          v-model="form.price"
          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          type="number"
        />
      </template>
      <template v-else>{{ product.price }}</template>
    </td>
    <td class="px-4 py-2">
      <template v-if="editing">
        <button @click.prevent="onSave" class="px-2 py-1 bg-blue-600 rounded-lg text-white">Save</button>
      </template>
      <template v-else>{{ createdAt }}</template>
    </td>
    <td class="px-4 py-2">{{ totalValue }}</td>
  </tr>
</template>

<script setup>
import moment from 'moment'
import { computed, ref } from 'vue'
import { router, useForm } from '@inertiajs/vue3'

const props = defineProps({
  product: Object,
})

const createdAt = computed(() => {
  return moment(props.product.created_at).format("MM/DD/YYYY HH:mm")
})

const totalValue = computed(() => {
  return props.product.quantity * props.product.price
})

const editing = ref(false)

const form = useForm({
  name: props.product.name,
  quantity: props.product.quantity,
  price: props.product.price,
})

const onEdit = () => {
  editing.value = true
}
const onSave = (event) => {
  event.stopPropagation()
  editing.value = false
  form.put(route('products.update', props.product.id))
}

</script>

<style scoped>

</style>
