<template>
    
<div class="modal fade" id="CreateLessonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="card card-shadowed  p-40 w-400 mb-10" style="max-width: 100%">
            <div class="form-group">
                <h3 class="text-centered"> {{editing ?' Edit a Lesson' : 'Create  a Lesson'}} </h3>
                    <label>Title</label>
                <input class="form-control " type="text" v-model="lesson.title" placeholder="Lesson Title">
            </div>
            <div class="form-group">
                    <label>Video Id</label>
                    <input class="form-control" type="number" v-model="lesson.video_id" placeholder="Vimeo Video ID">
            </div>
            <div class="form-group">
                    <label>Episode Number</label>
                    <input class="form-control" type="number" v-model="lesson.episode_number" placeholder="Series Episode Number">
            </div>
            <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="4" placeholder="Lesson Description" v-model="lesson.description"></textarea>
            </div>
            <div class="input-group">
             <button class="btn btn-primary" type="button" @click="createLesson" v-if="!editing"> Create Lesson</button>
               <button class="btn btn-primary" type="button" @click="updateTheLesson()" v-else>Save Changes</button>
            </div>
        
        </div>

    </div>
</div>
    
</template>
<script>
import Axios from 'axios';
class Lesson {
constructor(lesson){
this.title = lesson.title || '';
this.description = lesson.description || '',
this.episode_number = lesson.episode_number || '';
this.video_id = lesson.video_id || '';
}
}
export default {
    mounted() {
        this.$parent.$on('create_new_lesson', (seriesId)=>{
            this.seriesId = seriesId;
            this.lesson = new Lesson({});
            // alert(' Hello Parent, We are here');
            this.editing = false;
            $('#CreateLessonModal').modal();
        });
        this.$parent.$on('edit_lesson', ({lesson, seriesId})=>{
            this.editing = true;
            // alert(' Hello Parent, We are here');
            
            // this.description = lesson.description;
            // this.title = lesson.title; 
            // this.episode_number = +lesson.episode_number;
            // this.video_id = lesson.video_id;
            this.lesson = new Lesson(lesson);
            this.seriesId = seriesId;
            this.lessonId = lesson.id
            
            $('#CreateLessonModal').modal();
            
        });
    },
    data() {
        return {
            lesson: {},
            seriesId: '',
            editing: false,
            lessonId: null
        }
    },
    methods:{
        createLesson(){
            this.editing = false;
            Axios.post(`/admin/${this.seriesId}/lessons/`, this.lesson )
            .then(response =>{
                this.$parent.$emit('lesson_created', response.data);
                $('#CreateLessonModal').modal('hide');
                window.noty({
                message: 'Lesson Created sucesfully!',
                type: 'success'
            });
            }).catch(error =>{
                console.log(error.response.status)
                if (error.response.status = 422) {
                    window.noty({
                    message: 'We were not able to process your input, Please check your input and try again!',
                    type: 'danger'
                    });
                }else if(error.response.status = 500){
                    window.noty({
                    message: 'There seems to be a server error, or your token has expired, Please refresh and try again.',
                    type: 'danger'
                    })
                 }
            });
            // this.title= '';
            // this.description= '';
            // this.video_id= '';
            // this.episode_number= '';
            // this.seriesId= '';
            // this.editing= false;
            
        },
        updateTheLesson(){
            Axios.put(`/admin/${this.seriesId}/lessons/${this.lessonId}`, this.lesson)
            .then(response =>{
                console.log(response)
                $('#CreateLessonModal').modal('hide');
                this.$parent.$emit('lesson_updated', response.data)
                window.noty({
                message: 'Lesson Updated sucesfully!',
                type: 'success'
            });
            } ).catch(error=>{
                console.log(error.response.status)
                if (error.response.status = 422) {
                    window.noty({
                    message: 'We were not able to process your input, Please check your input and try again!',
                    type: 'danger'
                    });
                }else if(error.response.status = 500){
                    window.noty({
                    message: 'There seems to be a server error, or your token has expired, Please refresh and try again.',
                    type: 'danger'
                    })
                 }
            })
        }
    }
}
</script>