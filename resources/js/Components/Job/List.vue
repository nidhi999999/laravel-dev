<script setup lang="ts">
import Icon from '@/Components/Icon.vue';
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

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

defineProps({
    jobs: Array<JobPost>
});

const formatTime = (time: string) => {
  return dayjs(time).fromNow();
};

</script>
<template>
    <div class="container mx-auto px-4">
        
        <div v-if="jobs && jobs.length > 0">
            <div class="grid md:grid-cols-2 gap-6">
                <div v-for="job in jobs" :key="job.id" class="p-6 border rounded-xl shadow-sm bg-white">
                    <div class="flex items-center gap-4">
                        <img :src="job.company_logo_url" alt="Logo" class="w-20 h-20 rounded-full" />

                        <div class="flex flex-col">
                            <h3 class="text-lg font-semibold">{{ job.title }}</h3>
                            <h3 class="text-xs font-medium">{{ job.company_name }}</h3>
                        </div>

                        <div class="flex flex-wrap gap-2 ml-auto">
                            <span v-for="tag in job.extra" :key="tag" class="bg-gray-100 text-black-700 text-xs px-2 py-1 rounded-md">
                                {{ tag }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-sm text-gray-600 mt-2">
                        <span class="flex items-center"><Icon name="briefcase" class="w-4 h-4" /> {{ job.experience }} Yrs</span>
                        <span class="flex items-center"><Icon name="rupee" class="w-4 h-4" /> {{ job.salary }}</span>
                        <span class="flex items-center"><Icon name="location" class="w-4 h-4" /> {{ job.location }}</span>
                    </div>

                    <span class="flex items-center"><Icon name="file" class="w-6 h-6" /><p class="text-gray-600 mt-3 line-clamp-2">{{ job.description }}</p></span>

                    <div class="flex flex-wrap gap-2 mt-3">
                        <span v-for="skill in job.skills" :key="skill.id" class="px-2 py-1 bg-gray-200 text-gray-700 text-xs rounded-full">
                            {{ skill.name }}
                        </span>
                    </div>

                    <div class="mt-4 flex justify-end items-center">
                        <span class="text-xs text-gray-400">{{ formatTime(job.created_at) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="text-center p-12">
            <p class="text-lg font-medium text-gray-600">No jobs available</p>
        </div>
    </div>
</template>