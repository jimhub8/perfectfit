<template>
<VCardText>
    <ul class="list-group">
        <li class="list-group-item active">Category
            <label for="" style="float: right">{{ form.menus.menu }} </label>
        </li>
        <v-layout row wrap>
            <v-flex sm4 v-for="(cat_items, index) in form.category_new" :key="index" style="padding: 10px;">

                <v-hover v-slot:default="{ hover }" open-delay="100" close-delay="200">
                    <v-card :elevation="hover ? 16 : 2" class="mx-auto">
                        <v-card-text class="font-weight-medium mt-12 text-center subtitle-1">

                            <el-tag>{{ cat_items.category }}</el-tag>
                            <div>
                                <label for="">Quantity </label>
                                <el-input placeholder="0" v-model="cat_items.quantity"></el-input>
                            </div>
                            <div>
                                <label for="">Size </label>
                                <el-input placeholder="0" v-model="cat_items.size"></el-input>
                            </div>
                        </v-card-text>
                    </v-card>
                </v-hover>

            </v-flex>
        </v-layout>
        <v-divider></v-divider>
        <li class="list-group-item">School <label for="" style="float: right">{{ form.school.name }}</label></li>
        <!-- <li class="list-group-item">Size <label for="" style="float: right">{{ form.size }}</label></li> -->
    </ul>
</VCardText>
</template>

<script>
export default {
    props: ['form'],
    methods: {

    },
    computed: {

    },
}
</script>
