<template>
    <Head title="Create Community" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Community
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
               <div class="max-w-md mx-auto bg-white m-2 p-6">
                   <form @submit.prevent="submit">
                       <div>
                           <BreezeLabel for="name" value="Name" />
                           <BreezeInput
                               id="name"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.name"
                               autofocus
                               autocomplete="name"
                           />
                           <BreezeInputError class="mt-2" :message="form.errors.name" />
                       </div>
                       <div class="mt-4">
                           <BreezeLabel for="slug" value="Slug" />
                           <BreezeInput
                               id="slug"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.slug"
                               autocomplete="slug"
                           />
                           <BreezeInputError class="mt-2" :message="form.errors.slug" />
                       </div>
                       <div class="mt-4">
                           <BreezeLabel for="description" value="Description" />
                           <BreezeInput
                               id="description"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.description"
                               autocomplete="description"
                           />
                           <BreezeInputError class="mt-2" :message="form.errors.description" />
                       </div>

                       <div class="flex items-center justify-end mt-4">
                           <BreezeButton
                               class="ml-4"
                               :class="{ 'opacity-25': form.processing }"
                               :disabled="form.processing"
                           >
                               Store
                           </BreezeButton>
                       </div>
                   </form>
               </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BreezeButton from "@/Components/PrimaryButton.vue";
import BreezeInput from "@/Components/TextInput.vue";
import BreezeInputError from "@/Components/InputError.vue";
import BreezeLabel from "@/Components/InputLabel.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

/*defineProps({
    errors: Object
})*/

const form = useForm({
    name: "",
    description: "",
    slug: "",
});

const submit = () => {
    form.post(route("communities.store"), {
        onFinish: () => form.reset('name', 'description', 'slug')
    })
};
</script>