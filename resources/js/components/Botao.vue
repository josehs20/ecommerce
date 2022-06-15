<template>
  <button :type="type" @click="$emit('function-evento')" :class="estilo">{{ titulo }}</button>
</template>

<script>
export default {
  props: ['titulo', 'type', 'estilo'],
  emits:['function-evento'],
}
</script>