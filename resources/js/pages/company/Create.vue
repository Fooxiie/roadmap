<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Building, LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    name: '',
    address: '',
    city: '',
    country: '',
    phone: '',
    email: '',
    website: '',
    logo: null as File | null,
});

const submit = () => {
    form.post(route('company.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <AppLayout>
        <Head title="Create Company" />

        <div class="flex min-h-svh items-center justify-center p-6">
            <Card class="w-full max-w-2xl">
                <CardHeader>
                    <div class="flex items-center gap-2">
                        <Building class="size-6" />
                        <CardTitle>Create Your Company</CardTitle>
                    </div>
                    <CardDescription>
                        Enter your company details below to get started
                    </CardDescription>
                </CardHeader>

                <CardContent>
                    <form @submit.prevent="submit" class="space-y-6">
                        <div class="grid gap-6">
                            <div class="grid gap-2">
                                <Label for="name">Company Name</Label>
                                <Input
                                    id="name"
                                    type="text"
                                    required
                                    autofocus
                                    v-model="form.name"
                                    placeholder="Enter company name"
                                />
                                <InputError :message="form.errors.name" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="address">Address</Label>
                                <Input
                                    id="address"
                                    type="text"
                                    v-model="form.address"
                                    placeholder="Enter company address"
                                />
                                <InputError :message="form.errors.address" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="grid gap-2">
                                    <Label for="city">City</Label>
                                    <Input
                                        id="city"
                                        type="text"
                                        v-model="form.city"
                                        placeholder="Enter city"
                                    />
                                    <InputError :message="form.errors.city" />
                                </div>

                                <div class="grid gap-2">
                                    <Label for="country">Country</Label>
                                    <Input
                                        id="country"
                                        type="text"
                                        v-model="form.country"
                                        placeholder="Enter country"
                                    />
                                    <InputError :message="form.errors.country" />
                                </div>
                            </div>

                            <div class="grid gap-2">
                                <Label for="phone">Phone</Label>
                                <Input
                                    id="phone"
                                    type="tel"
                                    v-model="form.phone"
                                    placeholder="Enter phone number"
                                />
                                <InputError :message="form.errors.phone" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="email">Email</Label>
                                <Input
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    placeholder="Enter company email"
                                />
                                <InputError :message="form.errors.email" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="website">Website</Label>
                                <Input
                                    id="website"
                                    type="url"
                                    v-model="form.website"
                                    placeholder="Enter company website"
                                />
                                <InputError :message="form.errors.website" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="logo">Company Logo</Label>
                                <Input
                                    id="logo"
                                    type="file"
                                    accept="image/*"
                                    @change="form.logo = $event.target.files[0]"
                                />
                                <InputError :message="form.errors.logo" />
                            </div>
                        </div>

                        <CardFooter class="flex justify-end p-0">
                            <Button type="submit" :disabled="form.processing">
                                <LoaderCircle v-if="form.processing" class="mr-2 h-4 w-4 animate-spin" />
                                Create Company
                            </Button>
                        </CardFooter>
                    </form>
                </CardContent>
            </Card>
        </div>
    </AppLayout>
</template> 