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
                                <img :src="`/uploads/${order.provider.profile.profile_avatar}`" width="60" class="mr-3 rounded-circle" alt="...">
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
                        <img class="img-fluid" :src="orderImage" />
                    </a>
                </div>
                <div class="service-text min-height-80 py-3 px-4">
                    <div class="d-flex justify-content-between">
                        <div class="mr-3">
                            <td><small class="badge badge-warning py-1 px-2">{{ currentOrderStatus }}</small></td>
                            <a href="/services/1">
                                <h5 class="m-0 d-inline-block"> {{ selectedOrder.order_job_name }}</h5>
                                <small class="badge py-1 px-2" v-bind:class="selectedOrder.order_has_paid === 'yes' ? 'badge-success' : 'badge-danger'">{{ selectedOrder.order_has_paid === 'yes' ? 'Paid' : 'Not Paid'}}</small>
                            </a>
                            <p class="m-0"> <a :href="`/service-providers/${selectedOrder.order_provider_id}`" class="text-muted small">{{ selectedOrder.provider.name }}</a></p>
                        </div>
                        <div class="margin-top-minus-50">
                            <img :src="orderProviderImage" width="60" class="rounded-circle shadow" />
                            <h5 class="text-danger font-weight-bold"><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i><i data-feather="star" class="feather2"></i></h5>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h5>Update Order Status</h5>
                        <select class="form-control" v-model="currentOrderStatus" @change="updateStatus">
                            <option v-for="orderStatus in orderStatuses" v-bind:value="orderStatus.value">{{ orderStatus.text }}</option>
                        </select>
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
                    <div class="text-right" v-show="selectedOrder.order_has_paid !== 'yes'">
                        <stripe-payment :order_id="selectedOrder.order_id" :user_id="user_id" :callback="updateOrder"></stripe-payment>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import StripePayment from "./StripePayment";
    export default {
        name: "Orders",
        components: {StripePayment},
        props: ['orders', 'user_id'],
        mounted() {
            this.userAvatar = window.userAvatar;
        },
        data() {
            return {
                stripeAPIToken: 'pk_test_51HYtK4IkgVE5fsdbw5t4QKt9H1ZwBNYLT3AwJ3ph2sRflM1hp9n1KQ3KwKiuOCw3bOsxGzLx3ZipFNplaqpTqsZC00OXytB36F',
                stripe: '',
                userAvatar: '',
                elements: '',
                card: '',
                orderImage: '',
                currentOrderStatus: '',
                orderProviderImage: '',
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
                orderStatuses: [
                    { text: 'In Progress', value: 'in-progress' },
                    { text: 'Pending', value: 'pending' },
                    { text: 'Completed', value: 'completed' },
                    { text: 'Delayed', value: 'delayed' }
                ],
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
            updateOrder: function () {
                this.selectedOrder.order_has_paid = 'yes';
            },
            updateStatus: function () {
                let index = this.orders.findIndex(order => order.order_id === this.selectedOrder.order_id);
                axios.get(`/dashboard/orders/${this.selectedOrder.order_id}/${this.currentOrderStatus}`)
                    .then(res => {
                        alert('Status Updated');
                        this.orders[index].order_status = this.currentOrderStatus;
                    });
            },
            selectOrder: function (order) {
                this.selectedOrder = order;
                this.showOrder = true;
                this.currentOrderStatus = order.order_status;
                this.orderImage = `/uploads/${order.service.images[0].si_image}`;
                this.orderProviderImage = `/uploads/${order.provider.profile.profile_avatar}`;
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
