<template>
    <div>
        <section class="about">
            <h1 class="about__title mb42">CAREER</h1>
            <img class="lazy" src="/images/career-1.png" alt="" />
        </section>

        <section class="career">
            <div class="career__wrap center">
                <div class="career__left">
                    <div class="career__title mb30">START A CAREER AT MÉGATEX!</div>
                    <div class="career__text or16">
                        Would you like to join a dynamic team working in a rapidly expanding field?
                        Mégatex is looking for new talents. No experience is required since all
                        training is given on site. To apply, send us your resume today using our
                        unsolicited application form.
                    </div>
                </div>
                <form class="career__right career-form" @submit.prevent="handleSubmit($event)">
                    <div class="career-form__fields">
                        <div>
                            <input
                                v-model="careerForm.name"
                                type="text"
                                class="input-field"
                                required
                                placeholder="Name*"
                            />
                        </div>
                        <div>
                            <input
                                v-model="careerForm.phone"
                                type="number"
                                class="input-field"
                                required
                                placeholder="Phone*"
                            />
                        </div>
                        <div>
                            <input
                                v-model="careerForm.email"
                                type="email"
                                class="input-field"
                                required
                                placeholder="E-mail*"
                            />
                        </div>
                        <div>
                            <input
                                v-model="careerForm.desired_position"
                                type="text"
                                class="input-field"
                                required
                                placeholder="Desired Position"
                            />
                        </div>
                        <div>
                            <input id="file-2" type="file" name="file" @change="onImageChange" />
                            <label class="career-form__file-label or16" for="file-2">{{
                                fileName
                            }}</label>
                        </div>
                    </div>
                    <div class="career-form__checkbox">
                        <button class="bb bsl career-btn">Send</button>
                        <span class="or12">
                            <input id="checkbox-2" type="checkbox" name="checkbox" checked />
                            <label for="checkbox-2"
                                >By submitting a massage, you agree to the
                                <a href="#" class="lu">privacy policy</a></label
                            >
                        </span>
                    </div>
                </form>
            </div>
        </section>

        <div class="career-success bg4">
            <div class="career-success__block">
                <div class="career-success__title mb30">WE WILL CALL YOU BACK SOON!</div>
                <div class="career-success__buttons or16">
                    We are glad that you want to become a part of our team
                </div>
                <a href="#" class="bl">Homepage</a>
                <button class="career-success__close">
                    <svg class="career-success-icon">
                        <use xlink:href="#delete"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
// import "../../main";
// import "../../../css/toast/js/toast";
export default {
    name: "Careers",
    data() {
        return {
            careerForm: {
                name: "",
                phone: "",
                email: "",
                desired_position: "",
                document: "",
            },
            isLoader: false,
            url: "",
            fileName: "CV/Cover letter*",
        };
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length) return;

            this.fileName = files[0].name;
            this.url = URL.createObjectURL(files[0]);
            this.createDocument(files[0]);
        },
        createDocument(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.careerForm.document = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        handleSubmit(e) {
            var scope = this;
            $(".career-btn").html('<i class="fas fa-circle-notch fa-spin fast-spin"></i>');
            axios
                .post("/api/careers", scope.careerForm)
                .then((response) => response)
                .then(
                    (response) => {
                        if (response.data.success === true) {
                            $(".career-btn").html("Send");
                            scope.$toastr.s(response.data.message);
                            scope.isLoader = false;
                            scope.careerForm = "";
                            scope.fileName = "CV/Cover letter*";
                        } else {
                            $.each(response.data.message, function (key, value) {
                                scope.$toastr.e(value);
                            });
                        }
                    },
                    function (error) {
                        $(".career-btn").html("Send");
                    }
                );
        },
    },
};
</script>

<style scoped>

</style>
<style src="../../../css/career.css"></style>
