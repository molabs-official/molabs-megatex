<template>
    <div>
        <div>
            <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">
                Open Modal
            </b-button>

            <b-modal id="bv-modal-example" hide-footer>
                <template #modal-title> Using <code>$bvModal</code> Methods </template>
                <div class="d-block text-center">
                    <h3>Hello From This Modal!</h3>
                </div>
                <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')">
                    Close Me
                </b-button>
            </b-modal>
        </div>
    </div>
</template>

<script>
import "bootstrap-vue/dist/bootstrap-vue.css";
export default {
    name: "LoginModal",
};
</script>

<style scoped src="../../../css/sidebar/bootstrap.css"></style>
