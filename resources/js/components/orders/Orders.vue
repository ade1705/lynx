<template>
    <div class="row">
        <div class="p-3 bg-white shadow-sm" v-bind:class="showOrder ? 'col-md-5' : 'col-md-12'">
            <table class="table">
                <thead class="">
                <tr class="border-bottom small text-muted">
                    <th scope="col" class="border-0">CLIENT</th>
                    <th scope="col" class="border-0">JOB</th>
                    <th scope="col" class="border-0" v-bind:class="showOrder ? 'd-none' : 'd-display'">STATUS</th>
                    <th scope="col" class="border-0" v-bind:class="showOrder ? 'd-none' : 'd-display'">CREATED</th>
                    <th scope="col" class="border-0"></th>
                </tr>
                </thead>
                <tbody>
                    <tr class="" role="button" v-for="order in orders" :key="order.order_id" @click="selectOrder(order)" >
                        <th>
                            <div class="media">
                                <img src="https://images.unsplash.com/photo-1551741568-53a19562313c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=50&h=50&q=60" class="mr-3 rounded-circle" alt="...">
                                <div class="media-body">
                                    <h5 class="m-0">{{ order.customer.name}}</h5>
                                    <small class="text-muted">{{ order.customer.name }}</small>
                                </div>
                            </div>
                        </th>
                        <td>
                            {{ order.order_job_name }}
                            <div>
                                <small class="badge py-1 px-2" v-bind:class="order.order_has_paid === 'yes' ? 'badge-success' : 'badge-danger'">{{ order.order_has_paid === 'yes' ? 'Paid' : 'Not Paid'}}</small>
                            </div>
                        </td>
                        <td v-bind:class="showOrder ? 'd-none' : 'd-display'"><small class="badge badge-warning py-1 px-2">{{ order.order_status}}</small></td>
                        <td v-bind:class="showOrder ? 'd-none' : 'd-display'" class="text-muted">{{ order.created_at }}</td>
                        <td class="text-muted"><i data-feather="chevron-right"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-bind:class="showOrder ? 'col-md-7' : 'd-none'">
            <div class="service min-height-350 d-flex flex-column shadow bg-white">
                <div class="service-image height-300 overflow-hidden">
                    <a :href="`/services/${ selectedOrder.service.service_slug }`">
                        <img class="img-fluid" src="https://images.unsplash.com/photo-1492707892479-7bc8d5a4ee93?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=900&q=60" />
                    </a>
                </div>
                <div class="service-text min-height-80 py-3 px-4">
                    <div class="d-flex justify-content-between">
                        <div class="mr-3">
                            <td><small class="badge badge-warning py-1 px-2">{{ selectedOrder.order_status}}</small></td>
                            <a href="/services/1"><h5 class="m-0"> {{ selectedOrder.order_job_name }}</h5></a>
                            <p class="m-0"> <a :href="`/service-providers/${selectedOrder.order_provider_id}`" class="text-muted small">{{ selectedOrder.provider.name }}</a></p>
                        </div>
                        <div class="margin-top-minus-50">
                            <img src="https://images.unsplash.com/photo-1516876437184-593fda40c7ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=60&h=60&q=100" class="rounded-circle shadow" />
                            <h5 class="text-danger font-weight-bold"><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-muted m-0 small">CLIENT NAME</p>
                            <h6>{{ selectedOrder.customer.name }}</h6>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted m-0 small">DATE CREATED</p>
                            <h6>{{ selectedOrder.created_at }}</h6>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted m-0 small">PROJECT DETAILS</p>
                            <p>{{ selectedOrder.order_details }}
                            </p>
                        </div>
                    </div>
                    <hr/>
                    <div class="text-right">
                        <label>Card</label>
                        <div id="card-element">

                        </div>
                        <a href="#" class="btn btn-primary">Make Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Orders",
        props: ['orders'],
        mounted(){
            this.includeStripe('js.stripe.com/v3/', function(){
                this.configureStripe();
            }.bind(this) );
        },
        data() {
            return {
                stripeAPIToken: 'pk_test_51HYtK4IkgVE5fsdbw5t4QKt9H1ZwBNYLT3AwJ3ph2sRflM1hp9n1KQ3KwKiuOCw3bOsxGzLx3ZipFNplaqpTqsZC00OXytB36F',
                stripe: '',
                elements: '',
                card: '',
                showOrder: false,
                selectedOrder: {
                    provider: {
                        name: ''
                    },
                    customer: {
                        name: ''
                    },
                    service: {
                        service_slug: ''
                    }
                },
                items: [
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Foo' },
                    { message: 'Bar' }
                ]
            }
        },
        methods: {
            selectOrder: function (order) {
                this.selectedOrder = order;
                this.showOrder = true;
            },
            includeStripe( URL, callback ){
                let documentTag = document, tag = 'script',
                    object = documentTag.createElement(tag),
                    scriptTag = documentTag.getElementsByTagName(tag)[0];
                object.src = '//' + URL;
                if (callback) { object.addEventListener('load', function (e) { callback(null, e); }, false); }
                scriptTag.parentNode.insertBefore(object, scriptTag);
            },
            configureStripe(){
                this.stripe = Stripe( this.stripeAPIToken );

                this.elements = this.stripe.elements();
                this.card = this.elements.create('card');

                this.card.mount('#card-element');
            },
        }
    }
</script>

<style scoped>

</style>
