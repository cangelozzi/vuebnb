<!-- The template of this component will include a Font Awesome heart icon. It will also include a click handler which will be used to toggle the saved state. Since this component will always be a child of a listing or listing summary, it will receive a listing ID as a prop. Note that the click handler has a stop modifier. This modifier prevents the click event from bubbling up to ancestor elements, especially any anchor tags which might trigger a page change! -->

<template>
<div class="listing-save" @click.stop="toggleSaved()">
  <button v-if="button">
    <i :class="classes"></i>
    {{ message }}
  </button>
  <i v-else :class="classes"></i>
</div>
</template>

<script>
export default {
  props: ['id', 'button'],
  methods: {
    toggleSaved() {
      this.$store.dispatch('toggleSaved', this.id);
    }
  },

  /* Let's create a computed property isListingSaved, which will return a Boolean value reflecting whether or not this particular listing has been saved. */
  computed: {
    isListingSaved() {
      return this.$store.state.saved.find(saved => saved === this.id);
    },

    classes() {
      let saved = this.isListingSaved;
      return {
        'fa': true,
        'fa-lg': true,
        'fa-heart': saved,
        'fa-heart-o': !saved
      }
    },

    message() {
      return this.isListingSaved ? 'Saved' : 'Save';
    }

  }

}
</script>
<style>
.listing-save {
  position: absolute;
  top: 20px;
  right: 20px;
  cursor: pointer;
}

.listing-save .fa-heart-o {
  color: #ffffff;
}

.listing-save .fa-heart {
  color: #ff5a5f;
}

.listing-save i {
  padding-right: 4px;
}
.listing-save button .fa-heart-o {
  color: #808080;
}
</style>
