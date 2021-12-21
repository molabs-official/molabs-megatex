<template>
    <div>
        <section class="about">
            <h1 class="about__title mb42">Payment suceeded</h1>
            <img class="lazy" src="/images/career-1.png" alt="" />
        </section>
        <section class="career" style="margin-left: 25%">
            <div class="career__title mb30">Thank you for your order!</div>
            <div class="career__text or16">
                You have successfully placed the order. You can check status of your order by using
                our delivery status feature.
            </div>

            <router-link to="/" class="bb bsl"> Back to homepage </router-link>
        </section>
    </div>
</template>

<script>
export default {
    name: "PaymentSuccessfull",
};
</script>

<style scoped></style>
<style src="../../../css/career.css"></style>
