import { Component, OnInit } from '@angular/core';
import { Post } from 'src/app/models/post.model';
import { PostService } from 'src/app/services/post.service';

@Component({
	selector: 'app-add-post',
	templateUrl: './add-post.component.html',
	styleUrls: ['./add-post.component.css']
})
export class AddPostComponent implements OnInit {

	post: Post = {
		title: '',
		body: '',
	};
	
	submitted = false;

	// actionMessage = '';

	constructor(private postService: PostService) { }

	ngOnInit(): void {
		// this.actionMessage = '';
	}
	
	savePost(): void {
		// this.actionMessage = '';
		const data = {
			title: this.post.title,
			body: this.post.body,
		};

		this.postService.create(data)
		.subscribe({
			next: (res) => {
				console.log(res);
				this.submitted = true;
				// this.actionMessage = 'This Post was created successfully!';
			},
			error: (e) => console.error(e)
		});
  }

	newPost(): void {
		// this.actionMessage = '';
		this.submitted = false;
		this.post = {
			title: '',
			body: '',
		};
	}
}
