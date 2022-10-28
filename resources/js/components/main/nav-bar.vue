<template>
    <nav class="py-4">
        <div class="px-8 bg-black text-white h-16">
            <div class="flex justify-between">
                <!-- navbar left side -->
                <div class="flex m-6">
                    <router-link :to="{ name: 'home'}" class="hover:text-red-600 px-2"> Home </router-link>
                    <router-link :to="{ name: 'clients.index'}" class="hover:text-red-600 px-2"> Clients </router-link>
                </div>
                <!-- nav bar right side -->
                <div class="flex m-6">
                    <router-link :to="{ name: 'usage.index'}" class="hover:text-red-600 px-2"> Land Usages </router-link>
                </div>
            </div>
        </div>
    </nav>
</template>
