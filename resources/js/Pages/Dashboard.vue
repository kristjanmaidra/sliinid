<template>
  <Head title="Dashboard" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <p>Midagi muud</p>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default { layoutName: "Authenticated",
    components: {
      Head,
      Link
    }
 };
</script>
<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from "@inertiajs/inertia-vue3"

// // defineProps({
// //   topics: Array,

// })
</script>


