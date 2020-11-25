<template>
    <section id="addProductSection">
        <div class="alert alert-success my-5" role="alert" v-show="success">
            <strong>Product added!</strong> Hold up while I add that to the inventory...
        </div>

        <div class="AddProductButton my-4" v-if="formHidden && !success">
            <button class="btn btn-sm btn-outline-success" @click="showForm">
                Add a Product
            </button>
        </div>

        <div id="addProductForm" class="card mt-3" v-if="!formHidden">

            <div class="card-header">
                <h2 class="title m-b-md">Add Product</h2>
            </div>

            <div class="card-body">
                <div class="alert alert-danger my-2" role="alert" v-if="problem">
                    Ooops!  There was a problem with your submission.
                </div>

                <form @submit.prevent="submitForm" novalidate>
                    <div class="form-group">
                        <label for="category_id" class="hidden">Category</label>
                        <select id="category_id" name="category_id" class="form-control" v-model="newProduct.category_id">
                            <option disabled value="">== Select Product Category ==</option>
                            <option v-for="category in categories" :value="category.id" v-bind:key="category.id">{{ category.name }}</option>
                        </select>
                        <error-text v-bind:errors="errors.category_id"></error-text>
                    </div>

                    <div class="form-group">
                        <label for="name" class="hidden">Name</label>
                        <input type="text" class="form-control" id="name" required placeholder="Product Name" name="name" v-model="newProduct.name">
                        <error-text v-bind:errors="errors.name"></error-text>
                    </div>

                    <div class="form-group">
                        <label for="short_description" class="hidden">Short Description</label>
                        <input type="text" class="form-control" id="short_description" placeholder="Short Description" name="short_description" v-model="newProduct.short_description">
                        <error-text v-bind:errors="errors.short_description"></error-text>
                    </div>

                    <div class="form-group">
                        <label for="description" class="hidden">Full Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required placeholder="Full Description" v-model="newProduct.description"></textarea>
                        <error-text v-bind:errors="errors.description"></error-text>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="price" class="hidden">Price</label>
                                <currency-input class="form-control" id="price" required placeholder="Price" name="price" v-model="newProduct.price"></currency-input>
                                <error-text v-bind:errors="errors.price"></error-text>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group text-center pl-1 pt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="on_layaway" name="on_layaway" v-model="newProduct.on_layaway">
                                    <label class="form-check-label" for="on_layaway">
                                        On Layaway
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="hidden">Comment</label>
                        <input type="text" class="form-control" id="comment" placeholder="Comment (optional)" name="comment" v-model="newProduct.comment">
                        <error-text v-bind:errors="errors.comment"></error-text>
                    </div>

                    <button type="button" class="btn btn-outline-secondary" @click="hideForm">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Add Product
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
    import { CurrencyInput } from 'vue-currency-input'

    let errorText = {
        props: ['errors'],
        template: `
        <div class="mt-1 text-left">
            <p class="small text-danger" v-for="error in errors" v-bind:key="error.id">{{ error }}</p>
        </div>
    `};

    export default {

        props: {
            storeId: Number,
        },

        components: {
            CurrencyInput,
            errorText
        },

        data() {
            return {
                categories: null,
                success: false,
                problem: false,
                formHidden: true,
                errors: {},
                newProduct: {
                    category_id: '' // necessary to show the "Select a Category" option by default
                },
            }
        },

        mounted() {
            axios.get('categories').then(response => {
                this.categories = response.data.data;
            })
        },

        methods: {
            hideForm() {
                this.formHidden = true;
            },
            showForm() {
                this.formHidden = false;
            },
            checkForm() {
                // clear error / success messages
                this.errors = {};
                this.problem = false;
                this.success = false;

                if (!this.newProduct.name) {
                    this.errors.name = ['Product name is required.'];
                    this.problem = true;
                }

                if (!this.newProduct.category_id) {
                    this.errors.category_id = ['Product category is required.'];
                    this.problem = true;
                }

                if (!this.newProduct.description) {
                    this.errors.description = ['Description is required.'];
                    this.problem = true;
                }

                if (!this.newProduct.price) {
                    this.errors.price = ['Price is required.'];
                    this.problem = true;
                }

                return this.problem;
            },
            submitForm() {

                if(!this.checkForm()) {
                    console.log('Form Validated');

                    // add in the store id
                    this.newProduct.store_id = this.storeId;

                    // attempt to create new product
                    console.log('posting new product: ');
                    console.log(this.newProduct);
                    axios.post('products', this.newProduct).then(response => {
                        // success, so clear the form
                        this.newProduct = {};

                        // show success message and hide the form
                        this.success = true;
                        this.hideForm();

                        // cheat a little and reload the page so the new product shows up
                        setTimeout(location.reload.bind(location), 1000);

                    }).catch(error => {

                        // if we have a validation issue, show error messages
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
                            this.problem = true;
                        }

                        console.log('Error');
                    })
                }
            }
        }
    };
</script>
