<template>
    
<div class="modal fade" id="CreateLessonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="card card-shadowed  p-40 w-400 mb-10" style="max-width: 100%">
            <div class="form-group">
                <h3 class="text-centered"> {{editing ?' Edit a Lesson' : 'Create  a Lesson'}} </h3>
                    <label>Title</label>
                <input class="form-control " type="text" v-model="title" placeholder="Lesson Title">
            </div>
            <div class="form-group">
                    <label>Video Id</label>
                    <input class="form-control" type="number" v-model="video_id" placeholder="Vimeo Video ID">
            </div>
            <div class="form-group">
                    <label>Episode Number</label>
                    <input class="form-control" type="number" v-model="episode_number" placeholder="Series Episode Number">
            </div>
            <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="4" placeholder="Lesson Description" v-model="description"></textarea>
            </div>
            <div class="input-group">
             <button class="btn btn-primary" type="button" @click="createLesson" v-if="!editing">{{editing ? 'Save Changes to Lesson': 'Create Lesson'}}</button>
               <button class="btn btn-primary" type="button" @click="updateLesson" v-else>{{editing ? 'Save Changes to Lesson': 'Create Lesson'}}</button>
            </div>
        
        </div>

    </div>
</div>
    
</template>
<script>
import Axios from 'axios';
export default {
    mounted() {
        this.$parent.$on('create_new_lesson', (seriesId)=>{
            this.seriesId = seriesId;
            // alert(' Hello Parent, We are here');
            this.editing = false;
            $('#CreateLessonModal').modal();
        });
        this.$parent.$on('edit_lesson', (lesson)=>{
            this.editing = true;
            // alert(' Hello Parent, We are here');
            $('#CreateLessonModal').modal();
            this.description = lesson.description;
            this.title = lesson.title;
            this.episode_number = lesson.episode_number;
            this.video_id = lesson.video_id;
            
        });
    },
    data() {
        return {
            title: '',
            description: '',
            video_id: '',
            episode_number: '',
            seriesId: '',
            editing: false
        }
    },
    methods:{
        createLesson(){
            this.editing = false;
            Axios.post(`/admin/${this.seriesId}/lessons/`, {
            title: this.title,
            description: this.description,
            video_id: this.video_id,
            episode_number: this.episode_number,

            }).then(response =>{
                this.$parent.$emit('lesson_created', response.data);
                $('#CreateLessonModal').modal('hide');
            }).catch(error =>{
                console.log(error)
            });
            
        }
    }
}
</script>