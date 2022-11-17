import { Component, OnInit } from '@angular/core';
import { Post } from 'src/app/models/post.model';
import { PostService } from 'src/app/services/post.service';

@Component({
	selector: 'app-posts-list',
	templateUrl: './posts-list.component.html',
	styleUrls: ['./posts-list.component.css']
})
export class PostsListComponent implements OnInit {

	posts: Post[] = [];
	currentPost: Post = {};
	currentIndex = -1;

	page = 1;
	count = 0;
	pageSize = 5;
	pageSizes = [5, 10, 20];

	constructor(private postService: PostService) { }

	ngOnInit(): void {
		this.retrievePosts();
	}

	retrievePosts(): void {
		this.postService.getAll()
		.subscribe({
			next: (data) => {
				this.posts = data._embedded.post;
				console.log(data._embedded.post);
				
			},
			error: (err) => {
				console.log(err);
			}
		});
	}

	handlePageChange(event: number): void {
		this.page = event;
		this.retrievePosts();
	}

	handlePageSizeChange(event: any): void {
		this.pageSize = event.target.value;
		this.page = 1;
		this.retrievePosts();
	}

	refreshList(): void {
		this.retrievePosts();
		this.currentPost = {};
		this.currentIndex = -1;
	}

	setActivePost(post: Post, index: number): void {
		this.currentPost = post;
		this.currentIndex = index;
	}
}
