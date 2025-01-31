<script setup lang="ts">
import Hero from '@/Components/Dashboard/Hero.vue';
import JobList from '@/Components/Job/List.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from "axios";
import { router } from '@inertiajs/vue3';

interface Skill {
    id: number,
    name: string
}
interface JobPost {
  id: number;
  experience: number;
  company_logo: string;
  company_name: string;
  extra: object;
  salary: string;
  location: string;
  description: string;
  skills: Skill[];
  created_at: string;
  company_logo_url: string;
  title: string;
}

const props = defineProps<{ jobPosts: JobPost[] }>();

const jobs = ref<JobPost[]>([...props.jobPosts]);

const searchJobs = ({ title, location }: { title: string; location: string }) => {
  router.get('/dashboard', { 
    searchTitle: title, 
    searchLocation: location 
  }, {
    preserveState: true,
    onSuccess: (page) => {
      jobs.value = page.props.jobPosts as JobPost[]; // Update job list
    }
  });
};

</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- Hero -->
        <Hero @search="searchJobs"/>

        <!-- Job List -->
        <div class="bg-white">
            <div class="container py-5">
                <!-- TODO: Add job list here -->
                <JobList :jobs="jobPosts"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
