<template>
    <div class="container">

        <h1 class="text-center"> <button class="btn btn-primary" @click="createNewLesson()"> Create New Lesson</button></h1>
      <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between" v-for="lesson in lessons">
              <p>{{lesson.title}}</p> 
              <p>
                  <button class="btn btn-primary btn-xs" @click="updateLesson(lesson)"> Edit</button>
                  <button class="btn btn-danger btn-xs" @click="deleteLesson(lesson.id)"> Delete</button>
              </p>
          </li>
      </ul>
      <create-lesson> </create-lesson>
          </div>
</template> 

<script>
import Axios from 'axios';
export default {
    
    
    props: ['default_lessons', 'series_id'],
    mounted() {
        this.$on('lesson_created', lesson =>{
             this.lessons.push(lesson)
        });
        this.$on('lesson_deleted', lesson =>{
             this.lessons.pop(lesson)
        })
    },
    components: {
        // "create-lesson": require('./children/CreateLesson.vue')
    },
    data() {
        return {
            lessons: JSON.parse(this.default_lessons)
        }
    },
    // computed: {
    //     formattedLessons(){
    //         return JSON.parse(this.lessons);
    //     }
    
    methods: {
        createNewLesson(){
            this.$emit('create_new_lesson', this.series_id)
        },
        deleteLesson(id){
            if (confirm('Are you sure you want to delete this Lesson? ')) {
                Axios.delete(`/admin/${this.series_id}/lessons/${id}/`).then(response=>{
                    console.log(response);
                    this.$emit('lesson_deleted', response.data )
                }).catch(error=>{
                    console.log(error);
                })
            }
        },
        updateLesson(lesson){
            let seriesId = this.series_id;
            this.$emit('edit_lesson', lesson)
            // this.editing = true;
        }
    },
}
</script>