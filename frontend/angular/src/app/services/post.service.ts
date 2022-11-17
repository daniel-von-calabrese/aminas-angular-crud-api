import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Post } from '../models/post.model';

import {environment} from '../../environments/environment';

const baseUrl = 'http://localhost:8080/post';

@Injectable({
	providedIn: 'root'
})
export class PostService {
	
	header;

	constructor(private http: HttpClient) {
		this.header = new HttpHeaders().set(
		  'Authorization', 'Basic ' + environment.GM_API_KEY
		);
	}

	getAll(): Observable<any> {
		
		return this.http.get<any>(baseUrl);
	}

	get(id: any): Observable<Post> {
		return this.http.get<Post>(`${baseUrl}/${id}`);
	}

	create(data: any): Observable<any> {
		console.log(data);
		return this.http.post(baseUrl, data, {headers:this.header});
	}

	update(id: any, data: any): Observable<any> {
		console.log(data);
		return this.http.put(`${baseUrl}/${id}`, data, {headers:this.header});
	}

	delete(id: any): Observable<any> {
		return this.http.delete(`${baseUrl}/${id}`, {headers:this.header});
	}
}
