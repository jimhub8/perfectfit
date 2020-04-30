<template>
<v-content>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent max-width="800px">
            <v-card>
                <v-card-title primary-title>
                    <v-spacer></v-spacer>
                    <v-btn text icon color="primary" @click="close">
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-card-title>
                <input type="file" name="image" @change="Getimage" accept="image/*" style="display: none" ref="fileInput">
                <img :src="avatar" alt="" height="200px">
                <!-- <v-img class="white--text align-end" height="200px" :src="avatar"></v-img> -->
                    <v-card-actions>
                        <v-btn color="red" darken-1 raised @click="onPickFile" style="color: #fff;">Update Image</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn text @click="cancle" color="primary" v-show="imagePlaced">Cancle</v-btn>
                    </v-card-actions>
                <v-card-actions>
                    <v-btn text @click="upload" :disabled="loading" :loading="loading">Update</v-btn>
                </v-card-actions>
            </v-card>

        </v-dialog>
    </v-layout>
</v-content>
</template>

<script>
export default {
    name: 'images',
    props: ["user"],
    data: () => ({
        errors: {},
        loading: false,
        dialog: false,
        avatar: "",
        imagePlaced: false,
        files: [],
        product: [],
        images: [],
        product_id: null
    }),
    methods: {

        close() {
            this.dialog = false;
            // this.dialog = false;
        },

        onPickFile() {
            this.$refs.fileInput.click();
        },
        onFilePicked(event) {
            this.imagePlaced = true;
            const files = event.target.files;
            let filename = files[0].name;
            if (filename.lastIndexOf(".") <= 0) {
                return alert("please upload a valid image");
            }
            const fileReader = new FileReader();
            fileReader.addEventListener("load", () => {
                this.avatar = fileReader.result;
            });
            fileReader.readAsDataURL(files[0]);
            this.image = files[0];
        },
        Getimage(e) {
            let image = e.target.files[0];
            // this.read(image);
            let reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e => {
                this.avatar = e.target.result;
            };
            this.imagePlaced = true;
            let form = new FormData();
            form.append("image", image);
            this.file = form;
            this.file = form;
            console.log(e.target.files);
        },

        cancle() {
            this.avatar = this.product.image;
            this.imagePlaced = false;
        },

        upload() {
            console.log(this.file);
            this.loading = true;
            // var data = {
            //     'file': this.file,
            //     'id': this.product_id,
            // }
            axios
                .post(`/menu_image/${this.product_id}`, this.file)
                .then(response => {
                    this.loading = false;
                    // console.log(response);
                    eventBus.$emit("alertRequest", 'Successifully uploaded');
                    this.imagePlaced = false;
                    this.color = "black";
                    this.text = "Product image updated";
                    this.snackbar = true;
                    // this.close()
                })
                .catch(error => {
                    this.loading = false
                    if (error.response.status === 500) {
                        eventBus.$emit('errorEvent', error.response.statusText)
                        return
                    }
                    this.errors = error.response.data.errors;
                });
        },
    },
    created() {
        eventBus.$on("openCatImageEvent", data => {
            // alert('dialog')
            // console.log(data);

            this.product = data;
            this.avatar = data.image;
            this.dialog = true;
            this.product_id = data.id
            // this.getImages()
        });
    }
}
</script>
